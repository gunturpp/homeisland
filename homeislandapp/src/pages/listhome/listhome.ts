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
  checkin: any;
  duration: any;
  sumkamar: any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ListhomePage');
  }

  ionViewWillEnter(){
    this.getdatahomestay();
    this.checkin = this.navParams.get('checkin');
    this.duration = this.navParams.get('duration');
    this.sumkamar = this.navParams.get('sumkamar');
  }

  getdatahomestay(){
    this.http.get("http://127.0.0.1/homeisland/backend/getSearchHomestay.php?namahome="+ this.navParams.get('destination')+"&kuota="+this.navParams.get('sumkamar')).subscribe(data => {
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

  homestaylog(data){

  	this.navCtrl.push(HomestayPage,{id_homestay: data.id_homestay, checkin: this.checkin,duration: this.duration, sumkamar: this.sumkamar});
  }

}
