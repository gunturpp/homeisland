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

  getUsername() {
    this.data.getUsername().then((username) => {
      this.username = username;
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
