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
  // explore : any;
  kabupatens: any;
  @ViewChild('map') mapElement: ElementRef;

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http: Http,
              public toastCtrl: ToastController,
              public loadCtrl: LoadingController
            ) {
              // this.getdataNews();
              this.kabupatens = [];
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ExplorePage');
    
  }



  wisata(data){
    this.navCtrl.push('BintanPage', data);
  }

}
