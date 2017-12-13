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

  constructor(public navCtrl: NavController, public data: UserDataProvider, public http: Http, public storage: Storage) {
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
