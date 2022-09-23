import { Injectable } from '@angular/core';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class IndexService {

  constructor(public http: JanticipeHttpService) {
  }

  getNumberSpecialites() {
    return this.http.get('numberOfSpecialites');
  }

  getClasses() {
    return this.http.get('numberOfClasses');
  }

  getNumberOfCourse() {
    return this.http.get('numberOfCourse');
  }

  getNumberOfDocuments() {
    return this.http.get('numberOfDoc');
  }

  sendContact(contact: object) {
    return this.http.post('contact/message',contact)
  }

  getTypes() {
    return this.http.get('types');
  }

  getNiveaux() {
    return this.http.get('niveaux');
  }

  getAnneeAcademique() {
    return this.http.get('annee_academique');
  }

  getSpecialites() {
    return this.http.get('specialites');
  }

  getClasse() {
    return this.http.get('classes');
  }
}
