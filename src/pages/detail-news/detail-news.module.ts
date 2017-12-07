import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { DetailNewsPage } from './detail-news';

@NgModule({
  declarations: [
    DetailNewsPage,
  ],
  imports: [
    IonicPageModule.forChild(DetailNewsPage),
  ],
})
export class DetailNewsPageModule {}
