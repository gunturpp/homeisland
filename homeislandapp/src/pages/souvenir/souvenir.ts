import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { DetailSouvenirPage } from '../detail-souvenir/detail-souvenir';
import { Http } from '@angular/http';
// import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions ,Marker
//  } from '@ionic-native/google-maps';
 import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 
 import { Pipe, PipeTransform } from '@angular/core';
 import { orderBy } from 'lodash';
 
 @Pipe({
   name: 'orderBy'
 })
 export class OrderByPipe implements PipeTransform {
   transform = orderBy;
 }
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

  data : any;
  options : GeolocationOptions;
  currentPos : Geoposition;
  user_latitude : number;
  user_longitude : number;
  latitude : number;
  longitude : number;
  fix : any;
  panjang : number;
  qr: number = 4;
  nama_toko : any;
  alamat : any;
  lat : any;
  long: any;
  foto_1: any;
  foto_2: any;
  foto_3: any;
  hasil: any;
  pindah: any;
  open_hour : any;
  open_minute : any;
  close_hour : any;
  close_minute : any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http : Http, public geolocation : Geolocation) {
    this.fix = [];
    this.pindah = [];
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
 

//     getdataSouvenir(){
//     let data = JSON.stringify({
//                      user_latitude: this.user_latitude,
//                      user_longitude: this.user_longitude 
//                  });
     
//    this.http.get("http://127.0.0.1/homeisland/backend/getListSouvenir.php?user_latitude="+ this.user_latitude + "&user_longitude=" + this.user_longitude ).subscribe(data => {
//      let response = data.json();
//      console.log(response);
//     //  if(response.status=="200"){
//     //   //  this.array = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
//     //   //  this.nama_toko = this.array[0].nama_toko;
//     //   //  this.alamat = this.array[0].alamat;
//     //  }
//     //  else{
//     //    console.log("Error coy");
//     //  }
//    });
//  }

getdataSouvenir(){
  
 // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
   this.http.get("http://127.0.0.1:8000/api/get-souvenirs").subscribe(data => {
     let response = data.json();
     this.data = response.souvenirs;
     console.log(this.data);
     this.panjang = this.data.length;
     console.log(this.data.length);

     for(var i=0, j=0; i<this.panjang;i++){
       this.nama_toko = this.data[i].nama_toko;
       this.alamat = this.data[i].alamat;
       this.lat = this.data[i].lat;
       this.long = this.data[i].long;
       this.foto_1 = this.data[i].foto_1;
       this.foto_2 = this.data[i].foto_2;
       this.foto_3 = this.data[i].foto_3;
       this.open_hour = this.data[i].open_sale_hour;
       this.open_minute = this.data[i].open_sale_minute;
       this.close_hour = this.data[i].close_sale_hour;
       this.close_minute = this.data[i].close_sale_minute

       var jarak = this.hitungjarak(this.long, this.lat);
        this.hasil = jarak.toFixed(2);
        console.log(this.hasil)
       this.pindah[j] = ({
         nama_toko : this.nama_toko,
         alamat: this.alamat,
         lat: this.lat,
         long: this.long,
         open_hour : this.open_hour,
         open_minute : this.open_minute,
         close_hour : this.close_hour,
         close_minute : this.close_minute,
         foto_1: this.foto_1,
         foto_2: this.foto_2,
         foto_3: this.foto_3,

         jarak : this.hasil
       });
      
       j++
    }
    
    //  this.news = response.newss;
    //  this.data = this.news[0];
    //  this.judul = this.news[0].judul;
    //  this.foto  = this.news.foto
    this.pindah.sort(function(a, b) {
      return parseFloat(a.jarak) - parseFloat(b.jarak);
  });
  console.log(this.fix);

  for(var i=0, j=0; i<this.data.length;i++){
    if(i<= 3){
      this.fix[j] = this.pindah[i];
      
    }
    j++;
}

    console.log(this.fix);
     console.log("souvenir", response);
     if(response.status=="200"){
      //  this.news = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
     }
   });
}

Math_radians(degrees) {
  return degrees * Math.PI / 180;
};

hitungjarak(lat, long){
  var jarak = (6371 * Math.acos(Math.cos(this.Math_radians(this.user_latitude))
              * Math.cos(this.Math_radians(lat)) * Math.cos(this.Math_radians(long)
            - this.Math_radians(this.user_longitude)) + Math.sin(this.Math_radians(this.user_latitude))
            * Math.sin(this.Math_radians(lat))))
            return jarak;
          }

  souvenir(data){
    this.navCtrl.push("DetailSouvenirPage", data);
  }
}
