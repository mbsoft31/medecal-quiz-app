import React, { useState } from 'react'

import PageSidebar from "@/Components/Loyalty/Layout/Dashboard/Sidebar";
import Header from "@/Components/Loyalty/Layout/Dashboard/Header";
import {PageNavigation, PageProps, User} from "@/types";

export default function DashboardLayout({ user, header, children, navigations }: { user: User, header: any, children: any, navigations: PageNavigation }) {
  const [sidebarOpen, setSidebarOpen] = useState(false)

  return (
    <>
      <div>
        {/* Dashboard Sidebar */}
        <PageSidebar
          setSidebarOpen={setSidebarOpen}
          sidebarOpen={sidebarOpen}
          navigations={navigations}
        />

        <div className="lg:pl-72">

          {/* Dashboard Header */}
          <Header
            setSidebarOpen={setSidebarOpen}
            user={user}
            navigations={navigations}
          />

          {header && (
            <header className="bg-white shadow">
              <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{header}</div>
            </header>
          )}

          {/* Page's main content */}
          <main className="py-10 bg-gray-50">
            {children}
          </main>
        </div>
      </div>
    </>
  )
}
