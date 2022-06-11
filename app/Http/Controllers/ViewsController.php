<?php

namespace App\Http\Controllers;

use App\Models\ArticleView;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function incrementViews($id){
        if(request()->ajax() == true){
            $ipAddress = request()->ip();
            if($ipAddress == '127.0.0.1'){
                $ipAddress = $this->getRandomIp();
            }
            $location = \Location::get($ipAddress);

            ArticleView::create([
                'article_id' => $id,
                'location' => json_encode($location),
            ]);
        }
    }
    private function getRandomIp(){
        $ipArray = [
            '103.14.104.0',
            '103.14.107.255',
            '128.127.112.0',
            '128.127.127.255',
            '130.117.3.253',
            '130.117.3.253',
            '146.70.66.83',
            '146.70.66.83',
            '149.5.168.25',
            '149.5.168.25',
            '149.6.50.0',
            '149.6.51.255',
            '154.14.44.160',
            '154.14.44.161',
            '154.14.44.162',
            '154.14.44.163',
            '154.14.44.167',
            '154.54.78.222',
            '154.54.78.222',
            '176.111.3.0',
            '176.111.3.255',
            '176.126.122.0',
            '176.126.122.255',
            '184.104.204.65',
            '184.104.204.66',
            '185.144.80.0',
            '185.144.80.1',
            '185.144.80.2',
            '185.144.80.3',
            '185.144.80.4',
            '185.144.80.6',
            '185.144.80.8',
            '185.144.81.254',
            '185.144.81.255',
            '185.144.81.255',
            '185.212.106.30',
            '185.45.13.144',
            '185.45.13.167',
            '188.213.200.0',
            '188.213.201.255',
            '188.240.8.0',
            '188.240.12.255'
        ];

        return $ipArray[array_rand($ipArray)];
    }
}
