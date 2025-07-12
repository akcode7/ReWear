import { useState } from 'react';

export default function Login() {
  
  

  const [email, setEmail] = useState('');
const backgroundImage = "https://media.istockphoto.com/id/517188688/photo/mountain-landscape.jpg?s=1024x1024&w=0&k=20&c=z8_rWaI8x4zApNEEG9DnWlGXyDIXe-OmsAyQ5fGPVV8=";

  const handleLogin = (e) => {
    e.preventDefault();
    console.log('Logging in with:', { username, password });
  };

  return (
    
 <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-100 to-purple-200 p-4">
      <div className="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">
        {/* Left side - Image */}
        <div className="md:w-1/2 relative">
          <img 
            src='https://media.istockphoto.com/id/517188688/photo/mountain-landscape.jpg?s=1024x1024&w=0&k=20&c=z8_rWaI8x4zApNEEG9DnWlGXyDIXe-OmsAyQ5fGPVV8=' 
            alt="Canyon rock formation" 
            className="h-full w-full object-cover"
          />
        </div>
        
        {/* Right side - Login Form */}
        <div className="md:w-1/2 p-8 md:p-12">
          <div className="flex justify-between items-center mb-8">
            <div className="flex items-center">
              <div className="h-8 w-8 rounded-md bg-gradient-to-r from-orange-400 to-red-500"></div>
              <span className="ml-2 text-xl font-semibold text-gray-800">Recova</span>
            </div>
          </div>
          
          <h1 className="text-3xl font-bold text-gray-900 mb-2">Welcome to Recova</h1>
          <p className="text-gray-600 mb-8">
            Recova is a fast, simple and secure way to recover data. With it, you can protect your privacy and well being anytime and anywhere.
          </p>
          
          {/* Social Login Buttons */}
          <div className="space-y-4 mb-6">
            <button className="w-full flex items-center justify-center py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">
              <svg className="h-5 w-5 mr-2" viewBox="0 0 24 24" width="24" height="24">
                <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                  <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z"/>
                  <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z"/>
                  <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.724 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z"/>
                  <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z"/>
                </g>
              </svg>
              Continue with Google
            </button>
            
            <button className="w-full flex items-center justify-center py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">
              <svg className="h-5 w-5 mr-2" viewBox="0 0 24 24">
                <path fill="#0078D4" d="M11.5 12.5H6v-2h5.5V5h2v5.5H19v2h-5.5V18h-2v-5.5z"/>
                <path fill="#0078D4" d="M2 3h20v18H2V3zm2 2v14h16V5H4z"/>
              </svg>
              Continue with Microsoft
            </button>
          </div>
          
          <div className="relative my-6">
            <div className="absolute inset-0 flex items-center">
              <div className="w-full border-t border-gray-300"></div>
            </div>
            <div className="relative flex justify-center text-sm">
              <span className="px-2 bg-white text-gray-500">Or</span>
            </div>
          </div>
          
          {/* Email Login */}
          <div className="mb-6">
            <label htmlFor="email" className="sr-only">Email address</label>
            <input
              id="email"
              name="email"
              type="email"
              autoComplete="email"
              required
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              placeholder="john.doe@email.com"
              className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            />
          </div>
          
          <button
            type="submit"
            className="w-full py-3 px-4 bg-gradient-to-r from-orange-200 to-orange-300 hover:from-orange-300 hover:to-orange-400 text-gray-800 font-medium rounded-md transition duration-150"
          >
            Continue with email
          </button>
          
          <div className="mt-6 text-center">
            <p className="text-sm text-gray-600">
              Already have an account? <Link to="/signin" className="font-medium text-orange-600 hover:text-orange-500">Sign in</Link>
            </p>
          </div>
          
          <div className="mt-8 text-center text-xs text-gray-500">
            By signing up, you agree to our <a href="#" className="text-orange-600 hover:text-orange-500">Terms of services</a> + <a href="#" className="text-orange-600 hover:text-orange-500">Privacy policy</a>
          </div>
        </div>
      </div>
    </div>

  );
}
