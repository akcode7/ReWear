import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function UserDashboardInfo() {
  const [userData, setUserData] = useState({
    name: '',
    email: '',
    phone: '',
    info: '',
    randomData: ''
  });

  const [error, setError] = useState('');

  useEffect(() => {
    const fetchUserData = async () => {
      try {
        const user = JSON.parse(localStorage.getItem('user'));
        const user_id = user?.id;

        if (!user_id) {
          setError('User not logged in or missing user ID.');
          return;
        }

        const response = await axios.get('http://api.ashish.engineer/get_user.php', {
          params: { id: user_id } // <-- NOTE: Use "id" to match PHP
        });

        if (response.data.status === 'success') {
          setUserData({
            name: response.data.user.name || '',
            email: response.data.user.email || '',
            phone: response.data.user.phone || '',
            info: response.data.user.info || '',
            randomData: response.data.user.randomData || ''
          });
          setError('');
        } else {
          setError(response.data.message || 'Failed to fetch user data.');
        }
      } catch (err) {
        console.error('Fetch error:', err);
        setError('Network or server error while fetching user data.');
      }
    };

    fetchUserData();
  }, []);

  const handleChange = (e) => {
    const { id, value } = e.target;
    setUserData(prev => ({ ...prev, [id]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const session_id = localStorage.getItem('session_id');
      const res = await axios.post('http://api.ashish.engineer/updateUser.php', {
        ...userData,
        session_id
      });

      if (res.data.status === 'success') {
        alert('User data updated successfully!');
      } else {
        alert(res.data.message || 'Update failed.');
      }
    } catch (error) {
      console.error('Update error:', error);
      alert('Error updating user info.');
    }
  };

  return (
    <div>
      <header className="bg-blue-600">
        <nav className="text-white px-6 py-4 flex justify-between items-center container mx-auto">
          <div className="flex items-center space-x-2">
            <div className="bg-white p-2 rounded-md">
              <img src="https://placehold.co/600x400" alt="Logo" className="h-6 w-6" />
            </div>
            <span className="text-xl font-bold">Logo</span>
          </div>
          <ul className="flex space-x-6 text-sm font-medium">
            <li><Link to="/" className="hover:text-gray-300">Home</Link></li>
            <li><a href="#" className="hover:text-gray-300">Browse</a></li>
            <li><Link to="/login" className="hover:text-gray-300">Login</Link></li>
            <li><Link to="/signup" className="hover:text-gray-300">Sign Up</Link></li>
          </ul>
        </nav>
      </header>

      <div className="container mx-auto py-6">
        <div className="grid grid-cols-3 gap-4 p-6">
          <div className="col-span-1">
            <img src="https://placehold.co/400x400" alt="" className="rounded-full shadow-md" />
          </div>

          <div className="col-span-2">
            {error && <p className="text-red-600 mb-4">{error}</p>}

            <form onSubmit={handleSubmit}>
              <div className="grid grid-cols-2 gap-5">
                <div className="col-span-1 mb-4">
                  <label className="block text-sm font-medium text-gray-700 mb-2">Name</label>
                  <input
                    id="name"
                    value={userData.name}
                    onChange={handleChange}
                    className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                    type="text"
                  />
                </div>

                <div className="col-span-1 mb-4">
                  <label className="block text-sm font-medium text-gray-700 mb-2">Email</label>
                  <input
                    id="email"
                    value={userData.email}
                    onChange={handleChange}
                    className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                    type="email"
                  />
                </div>

                <div className="col-span-1 mb-4">
                  <label className="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                  <input
                    id="phone"
                    value={userData.phone}
                    onChange={handleChange}
                    className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                    type="text"
                  />
                </div>

                <div className="col-span-1 mb-4">
                  <label className="block text-sm font-medium text-gray-700 mb-2">Random Data</label>
                  <input
                    id="randomData"
                    value={userData.randomData}
                    onChange={handleChange}
                    className="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm"
                    type="text"
                  />
                </div>

                <div className="col-span-2 mb-4">
                  <label className="block text-sm font-medium text-gray-700 mb-2">Information</label>
                  <textarea
                    id="info"
                    value={userData.info}
                    onChange={handleChange}
                    className="w-full h-32 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm resize-none"
                  />
                </div>

                <button
                  type="submit"
                  className="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                >
                  Update Info
                </button>
                <button
                  className="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                >
                  Add Product
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}

export default UserDashboardInfo;
