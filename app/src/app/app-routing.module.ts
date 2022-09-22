import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ClasseComponent } from './module/classe/classe.component';
import { CoursComponent } from './module/cours/cours.component';
import { AboutComponent } from './pages/about/about.component';
import { ContactComponent } from './pages/contact/contact.component';
import { IndexComponent } from './pages/index/index.component';
import { PageNotFoundComponent } from './pages/page-not-found/page-not-found.component';

const routes: Routes = [
  {path:'', component:IndexComponent},
  {path:'contact', component:ContactComponent},
  { path: 'about', component: AboutComponent },
  {
    path: 'cours',
    component: CoursComponent,
    children: [
      {
        path: '',
        loadChildren: () =>
          import('./module/cours/cours.module').then((m) => m.CoursModule),
      },
    ],
  },
  {
    path: 'classe',
    component: ClasseComponent,
    children: [
      {
        path: '',
        loadChildren: () =>
          import('./module/classe/classe.module').then((m) => m.ClasseModule),
      },
    ],
  },
  { path: '**', component: PageNotFoundComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
