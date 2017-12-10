import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { DetailSouvenirPage } from '../detail-souvenir/detail-souvenir';
import { Http } from '@angular/http';
// import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions ,Marker
//  } from '@ionic-native/google-maps';
 import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 

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

  options : GeolocationOptions;
  currentPos : Geoposition;
  user_latitude : number;
  user_longitude : number;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http : Http, public geolocation : Geolocation) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SouvenirPage');
    this.getUserPosition();
  }

  getUserPosition(){
    this.options = {
      enableHighAccuracy : true
    };
    this.geolocation.getCurrentPosition(this.options)
    .then((pos : Geoposition) => {
      this.currentPos = pos;
      this.user_latitude = pos.coords.latitude;
      this.user_longitude = pos.coords.longitude;
      console.log("lat",this.user_latitude);
      console.log("long",this.user_longitude);
      //this.addMap(pos.coords.latitude, pos.coords.longitude)
      this.getdataSouvenir();
    },(err : PositionError)=>{
    console.log("error : " + err.message)
  });
 
 
  }
 

    getdataSouvenir(){
    let data = JSON.stringify({
                     user_latitude: this.user_latitude,
                     user_longitude: this.user_longitude 
                 });
     
   this.http.get("http://127.0.0.1/homeisland/backend/getListSouvenir.php?user_latitude="+ this.user_latitude + "&user_longitude=" + this.user_longitude ).subscribe(data => {
     let response = data.json();
     console.log(response);
    //  if(response.status=="200"){
    //   //  this.array = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
    //   //  this.nama_toko = this.array[0].nama_toko;
    //   //  this.alamat = this.array[0].alamat;
    //  }
    //  else{
    //    console.log("Error coy");
    //  }
   });
 }

  souvenir(data){
    this.navCtrl.push("DetailSouvenirPage", data);
  }
}
