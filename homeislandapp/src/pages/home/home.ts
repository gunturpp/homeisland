import { UserDataProvider } from './../../provider/user-data';
import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { HomestayPage } from '../homestay/homestay';
import { ExplorePage } from '../explore/explore';
import { NewsPage } from '../news/news';
import { SouvenirPage } from '../souvenir/souvenir';
import { SearchPage } from '../search/search';
import { Http } from '@angular/http';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  username: string;
  iduser: any;

  constructor(public navCtrl: NavController, public userDataProvider: UserDataProvider, public http: Http) {
  }

  ngAfterViewInit(){
    // this.getUsername();
    this.getiduser();
  }

  // getUsername() {
  //   this.data.getUsername().then((user) => {
  //     this.username = user;
  //     console.log(this.username)
  //   });
  // }
  getiduser(){
    this.userDataProvider.getPassword().then((password) => {
    this.iduser = password;
    console.log(this.iduser);
    // this.CekReview();  

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

}
