import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ClasseRoutingModule } from './classe-routing.module';
import { ClasseComponent } from './classe.component';
import { ClassListComponent } from '../../pages/classe/class-list/class-list.component';
import { ClassShowComponent } from 'src/app/pages/classe/class-show/class-show.component';
import { NzModalModule } from 'ng-zorro-antd/modal';
import { NzButtonModule } from 'ng-zorro-antd/button';
import { NzSelectModule } from 'ng-zorro-antd/select';
import { NzInputModule } from 'ng-zorro-antd/input';
import { FormsModule } from '@angular/forms';
import { FilterPipeModule } from 'ngx-filter-pipe';


@NgModule({
  declarations: [
    ClasseComponent,
    ClassListComponent,
    ClassShowComponent
  ],
  imports: [
    CommonModule,
    ClasseRoutingModule,
    NzModalModule,
    NzButtonModule,
    NzSelectModule,
    NzInputModule,
    FormsModule,
    FilterPipeModule
  ]
})
export class ClasseModule { }
