import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,ToastController,LoadingController } from 'ionic-angular';
import {DetailNewsPage} from '../detail-news/detail-news';
import { Http } from '@angular/http';
/**
 * Generated class for the NewsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-news',
  templateUrl: 'news.html',
})
export class NewsPage {
  news: any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http,
    public toastCtrl: ToastController, public loadCtrl: LoadingController) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NewsPage');
  }

  ionViewWillEnter() {
    this.getdataNews();
   }
 getdataNews(){
 	this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.news = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
      }
    });
 }
detailnews(data){
	this.navCtrl.push(DetailNewsPage,data);
}

}
