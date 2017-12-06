import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the BintanPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-bintan',
  templateUrl: 'bintan.html',
})
export class BintanPage {
  data:string;
  nama_kabupaten: string;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.data = this.navParams.data;
    this.nama_kabupaten = this.data;
    console.log(this.data);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad BintanPage');
  }

  wisata(data){
    this.navCtrl.push('DetailBintanPage', data);
  }

}
