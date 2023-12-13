import Repository from "./Repository";

export default {
    users(payload) {

        return Repository.get(`/user`, { params: payload });
        
    },
   
}
