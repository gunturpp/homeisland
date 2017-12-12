import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { HomestayPage } from '../homestay/homestay';
import { ExplorePage } from '../explore/explore';
import { NewsPage } from '../news/news';
import { SouvenirPage } from '../souvenir/souvenir';
import { SearchPage } from '../search/search';
import { UserDataProvider } from '../../provider/user-data';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  username: string;

  constructor(public navCtrl: NavController, public data: UserDataProvider) {
  }

  ngAfterViewInit(){
    this.getUsername();
    console.log(this.username);
  }

<<<<<<< HEAD
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
=======
  getUsername() {
    this.data.getUsername().then((username) => {
      this.username = username;
    });
  }
>>>>>>> f2a33021bcf76a5ab3d570bbfd294242d54453f4

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
