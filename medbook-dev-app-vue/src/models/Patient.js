export default class Patient {
    constructor(gender_id, service_id, name, dob, comments) {
      this.gender_id = gender_id;
      this.service_id = service_id;
      this.name = name;
      this.dob = dob;
      this.comments = comments;
    }
  }