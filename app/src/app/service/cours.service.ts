import { Injectable } from '@angular/core';
import { Cours } from '../model/Cours';
import { BaseService } from './base.service';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class CoursService extends BaseService<Cours> {

  constructor(public override http: JanticipeHttpService) {
    super(http);
    this.prefix = 'cours';
  }

}
