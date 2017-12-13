import { Component, ElementRef, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController,LoadingController } from 'ionic-angular';
import { DetailBintanPage } from '../detail-bintan/detail-bintan';
import { Http, Headers,RequestOptions } from '@angular/http'

/**
 * Generated class for the ExplorePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-explore',
  templateUrl: 'explore.html',
})
export class ExplorePage {
  data : string;
  @ViewChild('map') mapElement: ElementRef;

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http: Http,
              public toastCtrl: ToastController,
              public loadCtrl: LoadingController
            ) {
              // this.getdataNews();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ExplorePage');
    this.getdataExplore();
    
  }

  getdataExplore(){
    
   // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
     this.http.get("http://127.0.0.1:8000/api/get-explores").subscribe(data => {
       let response = data.json();
        console.log(response);
       if(response.status=="200"){
       }
     });
 
     
  }

  wisata(data){
    this.navCtrl.push('BintanPage', data);
  }

}
