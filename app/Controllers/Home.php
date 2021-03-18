<?php

namespace App\Controllers;
use \App\Models\AnketModel;
use \App\Libraries\SmsApi;

class Home extends BaseController
{
	public function index()
	{
		$model= new AnketModel();
		$data= $model->findAll();
		return view('index',["anket"=>$data]);
	}
	public function insert()
	{
		$model= new AnketModel();
		$data=[
			"tarih"=>date('Y-m-d H:i:s'),
			"cevap1"=>($this->request->getVar("answer1")),
			"cevap2"=>($this->request->getVar("answer2")),
			"cevap3"=>($this->request->getVar("answer3")),
			"cevap4"=>($this->request->getVar("answer4")),
			"cevap5"=>($this->request->getVar("answer5"))
		];
		$insert=$model->insert($data);
		if($insert){
			echo "Başarılı";
		}
		else{
			echo "Başarısız";
		}

	}
	public function TestSmsApi(){
		$api= new SmsApi();
		$result=$api->sendMessage("SMS API testi basariyla tamamlandi.");
		$result=json_decode($result);
		echo $result->result;
	}
}
