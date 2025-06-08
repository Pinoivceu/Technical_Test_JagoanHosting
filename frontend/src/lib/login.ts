import { useRouter } from 'next/navigation'
import { useCallback } from 'react'
import axios from 'axios'
import Cookies from 'js-cookie' 
import api from '@/services/api';

export function useLogin() {

  const router = useRouter();

  const login = useCallback(async (email: string, password: string) => {
    try {
      const res = await api.post('/login', {
        email,
        password,
      }, {
        withCredentials: true, 
      });

      if (res.status === 200) {
        const token = res.data.access_token; 
        Cookies.set('access_token', token); 
        router.push('/dashboard');
      }
    } catch (error) {
      console.error('Login error:', error);
    }
  }, [router]);

  return { login };
}
