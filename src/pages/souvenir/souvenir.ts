import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { DetailSouvenirPage } from '../detail-souvenir/detail-souvenir';

/**
 * Generated class for the SouvenirPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-souvenir',
  templateUrl: 'souvenir.html',
})
export class SouvenirPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SouvenirPage');
  }
  souvenir(data){
    this.navCtrl.push("DetailSouvenirPage", data);
  }
}
