import { Component, ElementRef, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams,ToastController,LoadingController } from 'ionic-angular';
import {DetailNewsPage} from '../detail-news/detail-news';
import {DetailEventPage} from '../detail-event/detail-event';
import { Http, Headers,RequestOptions } from '@angular/http'
/**
 * Generated class for the NewsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
let apiURL = "http://127.0.0.1:8000/api/"
@IonicPage()
@Component({
  selector: 'page-news',
  templateUrl: 'news.html',
})
export class NewsPage {
  @ViewChild('map') mapElement: ElementRef;
  news: any;
  newss: any;
  judul: string;
  foto: string;
  data: any;
  events: any;
  fotofix : any;
  event: any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http,
    public toastCtrl: ToastController, public loadCtrl: LoadingController) {
      this.event = [];
      // let token = localStorage.getItem('token');

      // let headers = new Headers({
      //   'Authorization': 'Bearer ' + token,
      //  });
      //  let options = new RequestOptions({ headers: headers });
  
      //  this.http.get(apiURL+'get-news', options)
      //  .map(res => this.newss= res.json())
      //  .subscribe(newss => {
      //      this.newss = newss['newss'];
      //      console.log('rev',this.newss);                 
      //   },
        
      //   error => {
      //     console.log(error); 
      //     // if(error.statusText=="Unauthorized" || error.statusText=="Bad Request" ){
      //     // localStorage.removeItem('token');
      //     // this.authService.logout();      
      //     // this.isLoggedIn = false;
      //     // this.navCtrl.setRoot(LoginPage);
      //     // this.navCtrl.push(LoginPage);
      //     // localStorage.clear();
      //     // }
      // });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NewsPage');
  }

  ionViewWillEnter() {
    this.getdataNews();
    this.getdataEvents();
   }
 getdataNews(){
   
  // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
  	this.http.get("http://127.0.0.1:8000/api/get-news").subscribe(data => {
      let response = data.json();
      this.news = response.newss;
      this.data = this.news[0];
      this.judul = this.news[0].judul;
      this.fotofix = this.news[0].foto;
      this.foto  = this.news.foto
      console.log(this.news.foto);
      if(response.status=="200"){
        this.news = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
      }
    });

    
 }

 getdataEvents(){
  
 // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
   this.http.get("http://127.0.0.1:8000/api/get-events").subscribe(data => {
     let response = data.json();
     this.events = response.events
    //  this.news = response.newss;
    //  this.data = this.news[0];
    //  this.judul = this.news[0].judul;
    //  this.foto  = this.news.foto
     console.log("events", response);
      console.log(this.events.length);

     for(var i=0 , j=0 ; i < this.events.length ; i++){
        if(j<=3){
          this.event[j] = this.events[i];
        }
        j++;
     }
     console.log(this.event)
   });

   
}
detailnews(data){
	this.navCtrl.push(DetailNewsPage,data);
}

detailevent(data){
	this.navCtrl.push(DetailEventPage,data);
}


}
