import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { DetailBintanPage } from '../detail-bintan/detail-bintan';

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
  data1: string = "pulau_bintan";
  data2: string = "tanjung_pinang";
  data3: string = "natuna";
  data4: string = "karimun";
  data5: string = "anambas";
  data6: string = "lingga";
  data7: string = "batam";

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ExplorePage');
  }
  wisata(data1){
    this.navCtrl.push('DetailBintanPage', data1);
  }
}
