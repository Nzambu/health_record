export default class Password {
    constructor(password, password_confirmation, token, previous_password) {
        this.password = password,
        this.password_confirmation = password_confirmation,
        this.token = token,
        this.previous_password = previous_password
    }
}