import { Component, ViewChild, ElementRef } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation';


declare var google;
/**
 * Generated class for the TesPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-tes',
  templateUrl: 'tes.html',
})
export class TesPage {
//   options : GeolocationOptions;
//   currentPos : Geoposition;
//   @ViewChild('map') mapElement : ElementRef;
//   map: any;
//   places : Array<any> ;

// @ViewChild('map') mapElement: ElementRef;
// @ViewChild('directionsPanel') directionsPanel: ElementRef;
// map: any;
// start = {lat: 37.77, lng: -122.447};
// end = {lat: 37.768, lng: -122.511};
// directionsService = new google.maps.DirectionsService;
// directionsDisplay = new google.maps.DirectionsRenderer;

@ViewChild('map') mapElement: ElementRef;
@ViewChild('directionsPanel') directionsPanel: ElementRef;
map: any;
  constructor(public navCtrl: NavController, public navParams: NavParams,  private geolocation: Geolocation) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad TesPage');
    // this.getUserPosition();
    console.log();
    // this.initMap();
    // this.calculateAndDisplayRoute();
    this.loadMap();
    this.startNavigating();
  }

//   addMap(lat,long){
    
//         let latLng = new google.maps.LatLng(lat, long);
    
//         let mapOptions = {
//         center: latLng,
//         zoom: 15,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//         }
    
//         this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
//         this.getRestaurants(latLng)
//         .then((results : Array<any>)=>{
//           this.places = results;
//           for(let i = 0; i < results.length; i++){
//               this.createMarker(results[i]);
//           }
//         }, (status)=>console.log(status));
    
//         this.addMarker();
//      }
    
//      addMarker(){
    
//         let marker = new google.maps.Marker({
//         map: this.map,
//         animation: google.maps.Animation.DROP,
//         position: this.map.getCenter()
//         });
    
//         let content = "<p>This is your current position !</p>";
//         let infoWindow = new google.maps.InfoWindow({
//         content: content
//         });
    
//         google.maps.event.addListener(marker, 'click', () => {
//         infoWindow.open(this.map, marker);
//         });
    
//      }
    
//      getUserPosition(){
//        this.options = {
//          enableHighAccuracy : false
//        };
//        this.geolocation.getCurrentPosition(this.options)
//        .then((pos : Geoposition) => {
//          this.currentPos = pos;
//          console.log(pos);
//          this.addMap(pos.coords.latitude, pos.coords.longitude)
//        },(err : PositionError)=>{
//        console.log("error : " + err.message)
//      });
    
    
//      }
    
//      getRestaurants(latLng)
//     {
//         var service = new google.maps.places.PlacesService(this.map);
//         let request = {
//             location : latLng,
//             radius : 8047 ,
//             types: ["yayasan"]
//         };
//         return new Promise((resolve,reject)=>{
//             service.nearbySearch(request,function(results,status){
//                 if(status === google.maps.places.PlacesServiceStatus.OK)
//                 {
//                     resolve(results);
//                 }else
//                 {
//                     reject(status);
//                 }
    
//             });
//         });
    
//     }
    
//     createMarker(place)
//     {
//         let marker = new google.maps.Marker({
//         map: this.map,
//         animation: google.maps.Animation.DROP,
//         position: place.geometry.location
//         });
//     } addMap(lat,long){
    
//         let latLng = new google.maps.LatLng(lat, long);
    
//         let mapOptions = {
//         center: latLng,
//         zoom: 15,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//         }
    
//         this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
//         this.getRestaurants(latLng)
//         .then((results : Array<any>)=>{
//           this.places = results;
//           for(let i = 0; i < results.length; i++){
//               this.createMarker(results[i]);
//           }
//         }, (status)=>console.log(status));
    
//         this.addMarker();
//      }
    
//      addMarker(){
    
//         let marker = new google.maps.Marker({
//         map: this.map,
//         animation: google.maps.Animation.DROP,
//         position: this.map.getCenter()
//         });
    
//         let content = "<p>This is your current position !</p>";
//         let infoWindow = new google.maps.InfoWindow({
//         content: content
//         });
    
//         google.maps.event.addListener(marker, 'click', () => {
//         infoWindow.open(this.map, marker);
//         });
    
//      }
    
//      getUserPosition(){
//        this.options = {
//          enableHighAccuracy : false
//        };
//        this.geolocation.getCurrentPosition(this.options)
//        .then((pos : Geoposition) => {
//          this.currentPos = pos;
//          console.log(pos);
//          this.addMap(pos.coords.latitude, pos.coords.longitude)
//        },(err : PositionError)=>{
//        console.log("error : " + err.message)
//      });
    
    
//      }
    
//      getRestaurants(latLng)
//     {
//         var service = new google.maps.places.PlacesService(this.map);
//         let request = {
//             location : latLng,
//             radius : 8047 ,
//             types: ["yayasan"]
//         };
//         return new Promise((resolve,reject)=>{
//             service.nearbySearch(request,function(results,status){
//                 if(status === google.maps.places.PlacesServiceStatus.OK)
//                 {
//                     resolve(results);
//                 }else
//                 {
//                     reject(status);
//                 }
    
//             });
//         });
    
//     }
    
//     createMarker(place)
//     {
//         let marker = new google.maps.Marker({
//         map: this.map,
//         animation: google.maps.Animation.DROP,
//         position: place.geometry.location
//         });
//     }


// initMap() {
//     this.map = new google.maps.Map(this.mapElement.nativeElement, {
//       zoom: 15,
//       center: {lat: 37.77, lng: -122.447}
//     });

//     this.directionsDisplay.setMap(this.map);
//     this.directionsDisplay.setPanel(this.directionsPanel.nativeElement);
//   }

//   calculateAndDisplayRoute() {
      
//     this.directionsService.route({
//       origin: {lat: 37.77, lng: -122.447},
//       destination: {lat: 37.768, lng: -122.511},
//       travelMode: 'DRIVING'
//     }, (response, status) => {
//       if (status === 'OK') {
//         this.directionsDisplay.setDirections(response);
//       } else {
//         window.alert('Directions request failed due to ' + status);
//       }
//     });
//   }

loadMap(){
    
           let latLng = new google.maps.LatLng(-34.9290, 138.6010);
    
           let mapOptions = {
             center: latLng,
             zoom: 15,
             mapTypeId: google.maps.MapTypeId.ROADMAP
           }
    
           this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
    
       }
    
       startNavigating(){
    
           let directionsService = new google.maps.DirectionsService;
           let directionsDisplay = new google.maps.DirectionsRenderer;
    
           directionsDisplay.setMap(this.map);
           directionsDisplay.setPanel(this.directionsPanel.nativeElement);
    
           directionsService.route({
            origin: {lat: 37.77, lng: -122.447},
            destination: {lat: 37.768, lng: -122.511},
               travelMode: google.maps.TravelMode['DRIVING']
           }, (res, status) => {
    
               if(status == google.maps.DirectionsStatus.OK){
                   directionsDisplay.setDirections(res);
               } else {
                   console.warn(status);
               }
    
           });
    
       }
}
