import { Injectable } from '@angular/core';
import { BaseClass } from '../model/Base-class';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export abstract class BaseService<T extends BaseClass> {

  prefix ='';

  constructor(public http: JanticipeHttpService) { }

  /**
   * @author Cheikh Tidiane GUEYE
   * @since 18.08.22
   * @description Récupére la liste de tous les enregistrements
   * @returns Promise
   */
  findAll() {
    return this.http.get(this.prefix);
  }

  findOneById(id: number) {
    return this.http.get(this.prefix + '/' + id);
  }
}
