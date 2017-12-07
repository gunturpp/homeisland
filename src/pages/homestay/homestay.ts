import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';

/**
 * Generated class for the HomestayPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-homestay',
  templateUrl: 'homestay.html',
})
export class HomestayPage {
  dataHomestay: any;
  namaHomestay: any;
  foto1: any;

  constructor(public navCtrl: NavController, public navParams: NavParams,
  	public http: Http) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad HomestayPage');
 //  	// var y = getDistanceFromLatLonInKm(-6.627006,106.822782,-6.625834,106.821408);
	//   function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
	//   var R = 6371; // Radius of the earth in km
	//   var dLat = deg2rad(lat2-lat1);  // deg2rad below
	//   var dLon = deg2rad(lon2-lon1); 
	//   var a = 
	//     Math.sin(dLat/2) * Math.sin(dLat/2) +
	//     Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
	//     Math.sin(dLon/2) * Math.sin(dLon/2); 
	//   var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	//   var d = R * c; // Distance in km
	//   document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(d*1000)+"KM";
	//  // return d;
	    
	// //  document.getElementById("demo").innerHTML = d+" km";
	// }
	// //document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(y*1000)+"KM";
	// function deg2rad(deg) {
 //  	return deg * (Math.PI/180)
	// }

	// 	getDistanceFromLatLonInKm(-6.627006,106.822782,-6.625834,106.821408);
	// 	//document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(y*1000)+"KM";
  }
  
  ionViewWillEnter(){
  	this.getdataHomestay();
  }
	 getdataHomestay(){
  	this.http.get("http://127.0.0.1/homeisland/backend/getDetailHomestay.php?id="+ this.navParams.get('id_homestay')).subscribe(data => {
  		let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.dataHomestay = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        this.namaHomestay = this.dataHomestay[0].Nama_homestay;
        this.foto1 = this.dataHomestay[0].foto1;
      }
      else{
        console.log("Error coy");
      }
    });

  }
}
