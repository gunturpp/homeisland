import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { DetailEventPage } from './detail-event';

@NgModule({
  declarations: [
    DetailEventPage,
  ],
  imports: [
    IonicPageModule.forChild(DetailEventPage),
  ],
})
export class DetailEventPageModule {}
