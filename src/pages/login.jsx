import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const Login = () => {
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });

  const handleChange = (e) => {
    const { id, value } = e.target;
    setFormData(prev => ({ ...prev, [id]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const res = await axios.post('http://api.ashish.engineer/login.php', formData, {
        headers: {
          'Content-Type': 'application/json'
        }
      });

      const data = res.data;

      if (data.status === 'success') {
        // Store session data
        localStorage.setItem('session_id', data.session_id);
        localStorage.setItem('user', JSON.stringify(data.user));

        alert('Login successful!');
        console.log('User logged in:', data.user);
        // You can redirect here using navigate('/dashboard') if using React Router
      } else {
        alert(data.message || 'Login failed');
      }
    } catch (error) {
      console.error('Login error:', error);
      alert('Network error or server issue during login.');
    }
  };

  const handleSocialLogin = (provider) => {
    console.log(`${provider} login clicked`);
  };

  return (
    <section
      className="min-h-screen bg-cover bg-center relative overflow-hidden"
      style={{ backgroundImage: "url('https://placehold.co/600x400')" }}
    >
      <div
        className="absolute inset-0 bg-cover bg-center filter blur-md scale-105 z-0"
        style={{ backgroundImage: "url('https://placehold.co/600x400')" }}
      ></div>

      <div className="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div className="grid grid-cols-7 bg-white rounded-3xl shadow-2xl max-w-4xl w-full overflow-hidden">
          <div className="col-span-3">
            <img
              src="https://placehold.co/350x500"
              alt="Background"
              className="w-full h-full object-cover"
            />
          </div>

          <div className="col-span-4 p-8 md:p-10">
            <div className="flex items-center mb-8">
              <div className="h-8 w-8 rounded-md bg-gradient-to-r from-orange-400 to-red-500"></div>
              <span className="ml-2 text-xl font-semibold text-gray-800">Recova</span>
            </div>

            <h2 className="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
            <p className="text-gray-600 mb-6 text-sm">
              Sign in to continue accessing Recova's powerful recovery tools.
            </p>

            <div className="space-y-3 mb-6">
              <button
                onClick={() => handleSocialLogin('Google')}
                className="w-full flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
              >
                <img
                  src="https://cdn-icons-png.flaticon.com/512/300/300221.png"
                  alt="Google"
                  className="h-5 w-5"
                />
                Continue with Google
              </button>

              <button
                onClick={() => handleSocialLogin('Microsoft')}
                className="w-full flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
              >
                <img
                  src="https://cdn-icons-png.flaticon.com/512/732/732221.png"
                  alt="Microsoft"
                  className="h-5 w-5"
                />
                Continue with Microsoft
              </button>
            </div>

            <div className="relative my-5">
              <div className="absolute inset-0 flex items-center">
                <div className="w-full border-t border-gray-300"></div>
              </div>
              <div className="relative flex justify-center text-sm">
                <span className="px-2 bg-white text-gray-500">Or</span>
              </div>
            </div>

            <form id="loginForm" onSubmit={handleSubmit}>
              <div className="mb-4 space-y-3">
                <input
                  type="email"
                  id="email"
                  placeholder="Enter your email"
                  value={formData.email}
                  onChange={handleChange}
                  className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                  required
                />
                <input
                  type="password"
                  id="password"
                  placeholder="Enter your password"
                  value={formData.password}
                  onChange={handleChange}
                  className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                  required
                />
              </div>

              <button
                type="submit"
                className="w-full py-3 px-4 bg-orange-100 hover:bg-orange-200 text-gray-800 font-medium rounded-md transition duration-150 text-sm"
              >
                Continue with email
              </button>
            </form>

            <p className="text-sm text-gray-600 text-center mt-6">
              Don’t have an account?{' '}
              <Link to="/signup" className="text-orange-600 hover:text-orange-500 font-medium">
                Sign up
              </Link>
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Login;
