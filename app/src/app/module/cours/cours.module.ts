import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CoursRoutingModule } from './cours-routing.module';
import { CoursComponent } from './cours.component';
import { CoursListComponent } from 'src/app/pages/cours/cours-list/cours-list.component';
import { CoursShowComponent } from 'src/app/pages/cours/cours-show/cours-show.component';


@NgModule({
  declarations: [
    CoursComponent,
    CoursListComponent,
    CoursShowComponent
  ],
  imports: [
    CommonModule,
    CoursRoutingModule
  ]
})
export class CoursModule { }
