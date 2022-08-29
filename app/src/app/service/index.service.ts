import { Injectable } from '@angular/core';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class IndexService {

  constructor(public http: JanticipeHttpService) {
  }

  getSpecialites() {
    return this.http.get('numberOfSpecialites');
  }

  getClasses() {
    return this.http.get('numberOfClasses');
  }

  getCM() {
    return this.http.get('numberOfCMDoc');
  }

  getExams() {
    return this.http.get('numberOfExamDoc');
  }

  sendContact(contact: object) {
    return this.http.post('contact/message',contact)
  }
}
