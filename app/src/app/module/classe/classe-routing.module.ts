import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ClassListComponent } from 'src/app/pages/classe/class-list/class-list.component';
import { ClassShowComponent } from 'src/app/pages/classe/class-show/class-show.component';

const routes: Routes = [
  { path: '', component: ClassListComponent },
  {path:':id/details', component:ClassShowComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ClasseRoutingModule { }
