import { Component, ElementRef, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
// import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions ,Marker
//  } from '@ionic-native/google-maps';
 import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 
//import { ViewChild } from '@angular/core/src/metadata/di';
import { ElementDef } from '@angular/core/src/view';


declare var google;
/**
 * Generated class for the DetailBintanPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-detail-bintan',
  templateUrl: 'detail-bintan.html',
})
export class DetailBintanPage {

  haha: any;
  data: any;
  nama_wisata: string;
  alamat: string; 
  options : GeolocationOptions;
  currentPos : Geoposition;
  @ViewChild('map') mapElement : ElementRef;
  @ViewChild('directionsPanel') directionsPanel: ElementRef;
  map: any;
  places : Array<any> ;
  langt : string;
  longt : string;
  foto_2: any;
  foto_3: any;
  hours : any;
  minutes : any;
  status : number = 0;
  times : number;
  tutup : number;
  buka : number;
  

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http:Http,
              private geolocation: Geolocation
            ) {
              this.data = this.navParams.data;
              this.langt = this.data.lat;
              this.longt = this.data.long;
              console.log(this.data.open_sale_hour);
              console.log(this.data);

              this.hours = new Date().getHours();
              this.minutes = new Date().getMinutes();

              this.times = (this.hours*3600 + this.minutes*60);
              this.buka = (this.data.open_hour*3600 + this.data.open_minute*60);
              this.tutup = (this.data.close_hour*3600 + this.data.close_minute*60);

              this.cekBuka(this.times, this.buka, this.tutup);
              
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailBintanPage');
    this.getUserPosition();
  }

  ionViewWillEnter() {
  
   }


   cekBuka(times, buka, tutup){
    if(buka <= times && times <= tutup){
        this.status = 1;
    }
  
  }


  //  getdataExplore(){
  //    let data = JSON.stringify({
  //                     nama_kabupaten: this.data 
  //                 });
      
  //   this.http.get("http://127.0.0.1/homeisland/backend/getExplore.php?nama_kabupaten="+ this.data).subscribe(data => {
  //     let response = data.json();
  //     console.log(response);
  //     if(response.status=="200"){
  //       this.haha = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
  //       this.nama_wisata = this.haha[0].nama_wisata;
  //       this.alamat = this.haha[0].alamat;
  //       this.langt = this.haha[0].langt;
  //       this.longt = this.haha[0].longt;
  //       console.log(this.langt);
  //     }
  //     else{
  //       console.log("Error coy");
  //     }
  //   });
  // }
  
  // addMap(lat,long){
    
  //       let latLng = new google.maps.LatLng(lat, long);
    
  //       let mapOptions = {
  //       center: latLng,
  //       zoom: 15,
  //       mapTypeId: google.maps.MapTypeId.ROADMAP
  //       }
    
  //       this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
  //       this.getRestaurants(latLng)
  //       .then((results : Array<any>)=>{
  //         this.places = results;
  //         for(let i = 0; i < results.length; i++){
  //             this.createMarker(results[i]);
  //         }
  //       }, (status)=>console.log(status));
    
  //       this.addMarker();
  //    }
    
  //    addMarker(){
    
  //       let marker = new google.maps.Marker({
  //       map: this.map,
  //       animation: google.maps.Animation.DROP,
  //       position: this.map.getCenter()
  //       });
    
  //       let content = "<p>This is your current position !</p>";
  //       let infoWindow = new google.maps.InfoWindow({
  //       content: content
  //       });
    
  //       google.maps.event.addListener(marker, 'click', () => {
  //       infoWindow.open(this.map, marker);
  //       });
    
  //    }
    
     getUserPosition(){
       this.options = {
         enableHighAccuracy : true
       };
       this.geolocation.getCurrentPosition(this.options)
       .then((pos : Geoposition) => {
         this.currentPos = pos;
         console.log(pos);
        //  this.addMap(pos.coords.latitude, pos.coords.longitude)
        this.loadMap(pos.coords.latitude, pos.coords.longitude);
        this.startNavigating(pos.coords.latitude, pos.coords.longitude, this.langt, this.longt);
       },(err : PositionError)=>{
       console.log("error : " + err.message)
     });
    
    
     }



     loadMap(lat, long){
      
             let latLng = new google.maps.LatLng(lat, long);
      
             let mapOptions = {
               center: latLng,
               zoom: 15,
               mapTypeId: google.maps.MapTypeId.ROADMAP
             }
      
             this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
      
         }
      
         startNavigating(lat, lang, langt, longt){
             let latLng = new google.maps.LatLng(lat, lang);
             let langtLngt = new google.maps.LatLng(langt, longt);

             let directionsService = new google.maps.DirectionsService;
             let directionsDisplay = new google.maps.DirectionsRenderer;
      
             directionsDisplay.setMap(this.map);
             directionsDisplay.setPanel(this.directionsPanel.nativeElement);
      
             directionsService.route({
              origin: latLng,
              destination: langtLngt,
                 travelMode: google.maps.TravelMode['DRIVING']
             }, (res, status) => {
      
                 if(status == google.maps.DirectionsStatus.OK){
                     directionsDisplay.setDirections(res);
                 } else {
                     console.warn(status);
                 }
      
             });
      
         }
    
    //  getRestaurants(latLng)
    // {
    //     var service = new google.maps.places.PlacesService(this.map);
    //     let request = {
    //         location : latLng,
    //         radius : 8047 ,
    //         types: ["restaurants"]
    //     };
    //     return new Promise((resolve,reject)=>{
    //         service.nearbySearch(request,function(results,status){
    //             if(status === google.maps.places.PlacesServiceStatus.OK)
    //             {
    //                 resolve(results);
    //             }else
    //             {
    //                 reject(status);
    //             }
    
    //         });
    //     });
    
    // }
    
    // createMarker(place)
    // {
    //     let marker = new google.maps.Marker({
    //     map: this.map,
    //     animation: google.maps.Animation.DROP,
    //     position: place.geometry.location,
    //     });
    //     let content = "<p>Restoran cooy !</p>";
    //     let infoWindow = new google.maps.InfoWindow({
    //     content: content
    //     });

            
    //     google.maps.event.addListener(marker, 'click', () => {
    //     infoWindow.open(this.map, marker);
    //     });
    
    // }

}
