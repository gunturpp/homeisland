import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
/**
 * Generated class for the FinishorderPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-finishorder',
  templateUrl: 'finishorder.html',
})
export class FinishorderPage {

  data: any;
  panjang: any;
  seleksi: any;
  kode_booking: any;
//  id_user: any;
  //id_homestay: any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {

  }	

  ionViewDidLoad() {
    console.log('ionViewDidLoad FinishorderPage');
  }

  ionViewWillEnter(){
  	this.getbookings();
  }

  getbookings(){
    //this.http.get("http://127.0.0.1/homeisland/backend/getSearchHomestay.php?namahome="+ this.navParams.get('destination')+"&kuota="+this.navParams.get('sumkamar')).subscribe(data => {
     this.http.get("http://127.0.0.1:8000/api/get-bookings").subscribe(data => {
     let response = data.json();
     this.data = response.bookings;
     console.log(this.data);
    // this.panjang = this.data.length;
     //console.log(this.data.length);
     	var i =0
       //for(var i=0; i<this.panjang;i++){
       while(true){
        	
         if(this.data[i].id_user == this.navParams.get('id_user') && this.data[i].id_homestay == this.navParams.get('id_homestay'))
         {
            this.seleksi = this.data[i];
            break;
         }
         i++;   
    }
     console.log(this.seleksi);
     this.kode_booking = this.seleksi.kode_booking

   //  let response = data.json();



      console.log(response);
    
    });

  }
}
