import { useState } from 'react'
import {FolderIcon, HomeIcon, UsersIcon,} from '@heroicons/react/24/outline'

import PageSidebar from "@/Components/Loyalty/Layout/Dashboard/Sidebar.tsx";
import Header from "@/Components/Loyalty/Layout/Dashboard/Header.tsx";

const navigation = [
  { name: 'Dashboard', href: '#', icon: HomeIcon, current: true },
  { name: 'Transactions', href: '#', icon: UsersIcon, current: false },
  { name: 'Rewards', href: '#', icon: FolderIcon, current: false },
]
const userNavigation = [
  { name: 'Your profile', href: '#' },
  { name: 'Sign out', href: '#' },
]
let teams = [];
const navigations = {
  navigation,
  teams,
  userNavigation
};

export default function Example() {
  const [sidebarOpen, setSidebarOpen] = useState(false)

  return (
    <>
      <div>
        {/* Dashboard Sidebar */}
        <PageSidebar
          setSidebarOpen={setSidebarOpen}
          sidebarOpen={sidebarOpen}
          navigations={navigations}
        >
        </PageSidebar>


        <div className="lg:pl-72">

          {/* Dashboard Header */}
          <Header setSidebarOpen={setSidebarOpen} navigations={navigations} />

          {/* Page's main content */}
          <main className="py-10 bg-gray-50">
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div className={'space-y-8'}>
                <div>
                  <Stats />
                </div>
                <div className="border border-gray-100 bg-white shadow rounded-md">
                  <div className="border-b border-gray-200 px-4 py-5 sm:px-6">
                    <div className="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                      <div className="ml-4 mt-2">
                        <h3 className="text-base font-semibold leading-6 text-gray-900">Latest Businesses</h3>
                      </div>
                      <div className="ml-4 mt-2 flex-shrink-0">
                        <button
                          type="button"
                          className="relative inline-flex items-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                        >
                          Create Program
                        </button>
                      </div>
                    </div>
                  </div>
                  <div className="px-4 py-5 sm:px-6">

                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
    </>
  )
}

function Stats() {
  const stats = [
    { name: 'POINTS', stat: '6624' },
    { name: 'Gifts received', stat: '0' },
    { name: 'Transactions made', stat: '0' },
    { name: 'Sales value', stat: '$0.00' },
  ]
  return (
    <div>
      <h3 className="text-base font-semibold leading-6 text-gray-900">Last 30 days</h3>
      <dl className="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-3 md:grid-cols-4">
        {stats.map((item) => (
          <div key={item.name} className="overflow-hidden rounded-lg bg-white px-4 py-5 shadow-md sm:p-6">
            <dt className="truncate text-sm font-medium text-gray-500">{item.name}</dt>
            <dd className="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{item.stat}</dd>
          </div>
        ))}
      </dl>
    </div>
  )
}
