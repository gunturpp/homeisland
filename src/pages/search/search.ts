import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,ToastController,LoadingController } from 'ionic-angular';
import { ListhomePage } from '../listhome/listhome';
import { Http } from '@angular/http';
import { NgForm } from '@angular/forms';

/**
 * Generated class for the SearchPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-search',
  templateUrl: 'search.html',
})
export class SearchPage {

  homestaySearch: {destinasi?: string} = {};

  constructor(public navCtrl: NavController, public navParams: NavParams,
              public http: Http,
             public toastCtrl: ToastController,
             public loadCtrl: LoadingController
    ) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SearchPage');
  }

  search(form: NgForm){
  	this.navCtrl.push(ListhomePage, {destination: this.homestaySearch.destinasi});
  }
}
