import React from 'react';
import { Link } from 'react-router-dom';

const Homepage = () => {
  const handleStartSwapping = () => {
    // Handle start swapping action
    console.log('Start swapping clicked');
  };

  const handleBrowseItems = () => {
    // Handle browse items action
    console.log('Browse items clicked');
  };

  const categories = Array(8).fill(null); // Create 8 category placeholders

  const products = [
    {
      id: 1,
      title: "Title here",
      description: "Description of the product goes here.",
      image: "https://placehold.co/600x400"
    },
    {
      id: 2,
      title: "Title here",
      description: "Description of the product goes here.",
      image: "https://placehold.co/600x400"
    },
    {
      id: 3,
      title: "Title here",
      description: "Description of the product goes here.",
      image: "https://placehold.co/600x400"
    }
  ];

  return (
    <div>
      {/* Navbar */}
      <header className="bg-blue-600">
        <nav className="text-white px-6 py-4 flex justify-between items-center container mx-auto">
          <div className="flex items-center space-x-2">
            <div className="bg-white p-2 rounded-md">
              <img src="https://placehold.co/600x400" alt="Logo" className="h-6 w-6" />
            </div>
            <span className="text-xl font-bold">Logo</span>
          </div>
          <ul className="flex space-x-6 text-sm font-medium">
            <li>
              <Link to="/" className="hover:text-gray-300">Home</Link>
            </li>
            <li>
              <a href="#" className="hover:text-gray-300">Browse</a>
            </li>
            <li>
              <Link to="/login" className="hover:text-gray-300">Login</Link>
            </li>
            <li>
              <Link to="/signup" className="hover:text-gray-300">Sign Up</Link>
            </li>
          </ul>
        </nav>
      </header>

      {/* Hero Section */}
      <div 
        className="bg-cover bg-center text-center py-40 px-4 text-white"
        style={{ backgroundImage: "url('https://placehold.co/600x400')" }}
      >
        <h1 className="text-4xl font-bold mb-6">Start Swapping</h1>
        <div className="flex flex-col sm:flex-row justify-center gap-4">
          <button 
            onClick={handleStartSwapping}
            className="bg-white text-black font-semibold px-6 py-3 rounded-md shadow hover:bg-gray-100"
          >
            Start Swapping
          </button>
          <button 
            onClick={handleBrowseItems}
            className="bg-white text-black font-semibold px-6 py-3 rounded-md shadow hover:bg-gray-100"
          >
            Browse Items
          </button>
        </div>
      </div>

      {/* Categories */}
      <div className="bg-white py-10 px-4 rounded-t-3xl">
        <h2 className="text-2xl font-bold text-center mb-6">Categories Section</h2>
        <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 max-w-6xl mx-auto mb-10">
          {categories.map((_, index) => (
            <div 
              key={index}
              className="bg-blue-500 h-32 rounded-md cursor-pointer hover:bg-blue-600 transition-colors"
            ></div>
          ))}
        </div>

        {/* Product Listings */}
        <h2 className="text-2xl font-bold text-center mb-6">Product Listings</h2>
        <div className="grid grid-cols-2 sm:grid-cols-3 gap-6 max-w-6xl mx-auto">
          {products.map((product) => (
            <div key={product.id} className="bg-white shadow rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
              <div className="bg-gray-100">
                <img 
                  src={product.image} 
                  alt={product.title} 
                  className="w-full rounded-t-2xl" 
                />
              </div>
              <div className="px-3 py-4">
                <h2 className="font-semibold">{product.title}</h2>
                <p className="text-gray-500">{product.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Homepage;