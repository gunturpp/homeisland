import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
//import { ListhomePage } from '../homestay/homestay';
import { HomestayPage } from '../homestay/homestay';
import { Http } from '@angular/http';
/**
 * Generated class for the ListhomePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-listhome',
  templateUrl: 'listhome.html',
})
export class ListhomePage {

  listhomestay : any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ListhomePage');
  }

  ionViewWillEnter(){
    this.getdatahomestay();
  }

  getdatahomestay(){
    this.http.get("http://127.0.0.1/homeisland/backend/getSearchHomestay.php?namahome="+ this.navParams.get('destination')).subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.listhomestay = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
      }
      else{
        console.log("Error coy");
      }
    });

  }

  homestaylog(){
  	this.navCtrl.push(HomestayPage);
  }

}
