import React from 'react'
import UserDashboardInfo from '../components/userDashboardInfo';
import UserDashboardListing from '../components/userDashboardListing';  
import UserDashboardPurchase from '../components/userDashboardPurchase';

export default function UserDashboard() {
  return (
    <div>
        <UserDashboardInfo />
        <UserDashboardListing />
        <UserDashboardPurchase />
    </div>
  )
}
