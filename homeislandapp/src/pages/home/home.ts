import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { HomestayPage } from '../homestay/homestay';
import { ExplorePage } from '../explore/explore';
import { NewsPage } from '../news/news';
import { SouvenirPage } from '../souvenir/souvenir';
import { SearchPage } from '../search/search';
import { UserDataProvider } from '../../provider/user-data';
import { Http, Headers,RequestOptions } from '@angular/http'
import { Storage } from '@ionic/storage';
import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 



@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  username: string;
  iduser : string;
  user: any;
  users: any;
  email: string;
  hp : string;
  gender: string;
  nama: string;
  id: string;
  admin: string;
  kabupaten: string;
  nama_homestay: string;
  price: number;
  kuota: number;
  id_fasilitas: number;
  id_rating: number;
  address: string;
  lat: number;
  long:number;
  foto_1: string;
  foto_2: string;
  foto_3: string;
  hasil: string;

  options : GeolocationOptions;
  currentPos : Geoposition;
  user_latitude : number;
  user_longitude : number;
  latitude : number;
  longitude : number;
  fix : any;
  panjang : number;
  datas : any;
  pindah: any;


  constructor(public navCtrl: NavController, public data: UserDataProvider, public http: Http, public storage: Storage, public geolocation : Geolocation) {
    this.pindah = [];
    this.fix = [];
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

  getdataSouvenir(){
    
   // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
     this.http.get("http://127.0.0.1:8000/api/get-homestays").subscribe(data => {
       let response = data.json();
       this.datas = response.homestays;
       console.log(this.data);
       this.panjang = this.datas.length;
       console.log(this.datas.length);
  
       for(var i=0, j=0; i<this.panjang;i++){
         this.id = this.datas[i].id;
         this.admin = this.datas[i].admin;
         this.kabupaten = this.datas[i].kabupaten;
         this.nama_homestay = this.datas[i].nama_homestay;
         this.price = this.datas[i].price;
         this.kuota = this.datas[i].kuota;
         this.id_fasilitas = this.datas[i].id_fasilitas;
         this.id_rating = this.datas[i].id_rating;
         this.address = this.datas[i].address;
         this.lat = this.datas[i].lat;
         this.long = this.datas[i].long;
         this.foto_1 = this.datas[i].foto_1;
         this.foto_2 = this.datas[i].foto_2;
         this.foto_3 = this.datas[i].foto_3;

         var jarak = this.hitungjarak(this.lat, this.long);
          this.hasil = jarak.toFixed(2);
          console.log(this.hasil)
         this.pindah[j] = ({
           id : this.id,
           admin: this.admin,
           kabupaten: this.kabupaten,
           nama_homestay: this.nama_homestay,
           price: this.kuota,
           id_fasilitas: this.id_fasilitas,
           id_rating: this.id_rating,
           address: this.address,
           lat: this.lat,
           long: this.long,
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
  
    for(var i=0, j=0; i<this.datas.length;i++){
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


near(){
  
}













  ngAfterViewInit(){
    this.getEmail();
    console.log(this.email);
  }

  getEmail() {
    this.data.getEmail().then((email) => {
      this.email = email;
      console.log(this.email)
      this.binding();
    });
  }



slide_homestay(){
	this.navCtrl.push('SearchPage');
}

slide_explore(){
	this.navCtrl.push('ExplorePage');
}

slide_souvenir(){
	this.navCtrl.push('SouvenirPage');
}
slide_news(){
	this.navCtrl.push('NewsPage');
}


binding(){
  // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
this.http.get("http://127.0.0.1:8000/api/get-users").subscribe(data => {
 let response = data.json();
 this.user= response.users
//  this.news = response.newss;
//  this.data = this.news[0];
//  this.judul = this.news[0].judul;
//  this.foto  = this.news.foto
 console.log("events", response);
  console.log(this.user.length);
  console.log(this.user.email);

 for(var i=0  ; i < this.user.length ; i++){
    if(this.user[i].email == this.email){
      this.users = this.user[i];
    }
 }
    this.iduser = this.users.id;
    this.nama = this.users.name
    console.log(this.nama);
    this.hp = this.users.hp;
    this.gender = this.users.gender;

    this.storage.set('id',this.iduser);    
    this.storage.set('nama',this.nama);
    this.storage.set('hp',this.hp);
    this.storage.set('gender',this.gender);
 console.log(this.users)
});
}



}
