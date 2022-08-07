import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CoursListComponent } from 'src/app/pages/cours/cours-list/cours-list.component';
import { CoursShowComponent } from 'src/app/pages/cours/cours-show/cours-show.component';

const routes: Routes = [
  { path: '', component: CoursListComponent },
  {path:'details', component:CoursShowComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CoursRoutingModule { }
