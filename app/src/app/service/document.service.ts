import { Injectable } from '@angular/core';
import { Document } from '../model/Document';
import { BaseService } from './base.service';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class DocumentService extends BaseService<Document> {

  constructor(public override http: JanticipeHttpService) {
    super(http);
    this.prefix = 'document';
  }

  findCourseDocument(id: number) {
    return this.http.get(this.prefix + '/courseDocument/' + id)
  }
}
