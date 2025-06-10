import Cookies from 'js-cookie';

export const handleLogout = () => {
  Cookies.remove('access_token'); 
  window.location.href = '/login'; 
};
