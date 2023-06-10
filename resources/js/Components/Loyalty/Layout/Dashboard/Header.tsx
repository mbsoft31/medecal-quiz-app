import React, { Fragment } from 'react'
import {Bars3Icon, BellIcon} from "@heroicons/react/24/outline/index.js";
import {ChevronDownIcon, MagnifyingGlassIcon} from "@heroicons/react/20/solid/index.js";
import {Menu, Transition} from "@headlessui/react";

import {classNames} from "@/Utils/functions";
import {NavigationLink} from "@/types";
import {Link} from "@inertiajs/react";

// @ts-ignore
export default function PageHeader ({setSidebarOpen, navigations, user}) {
  return (
    <div className="sticky top-0 z-40 lg:mx-auto lg:max-w-7xl lg:px-8 border-b border-gray-200 bg-white">
      <div className="flex h-16 items-center gap-x-4 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-0 lg:shadow-none">

        {/* Open Sidebar Hamburger button */}
        <HamburgerButton onClick={() => setSidebarOpen(true)}/>

        {/* Separator */}
        <Separator className={"lg:hidden"}/>

        <div className="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">

          {/* Search form */}
          <SearchForm/>

          <div className="flex items-center gap-x-4 lg:gap-x-6">

            {/* Notification button */}
            <NotificationButton/>

            {/* Separator */}
            <Separator className={"hidden lg:block"}/>

            {/* Profile dropdown */}
            <ProfileDropdown navigations={navigations}/>
          </div>
        </div>
      </div>
    </div>
  )
}

// @ts-ignore
function HamburgerButton({ onClick, className = "" }) {
  return (
    <button
      type="button"
      className={ classNames(
        "-m-2.5 p-2.5 text-gray-700 lg:hidden",
        className
      )}
      onClick={onClick}
    >
      <span className="sr-only">Open sidebar</span>
      <Bars3Icon className="h-6 w-6" aria-hidden="true"/>
    </button>
  )
}

function SearchForm() {
  return <form className="relative flex flex-1" action="#" method="GET">
    <label htmlFor="search-field" className="sr-only">
      Search
    </label>
    <MagnifyingGlassIcon
      className="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-gray-400"
      aria-hidden="true"
    />
    <input
      id="search-field"
      className="block h-full w-full border-0 py-0 pl-8 pr-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
      placeholder="Search..."
      type="search"
      name="search"
    />
  </form>;
}

function NotificationButton() {
  return <button type="button" className="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
    <span className="sr-only">View notifications</span>
    <BellIcon className="h-6 w-6" aria-hidden="true"/>
  </button>;
}

// @ts-ignore
function ProfileDropdown({ navigations }) {
  const {userNavigation} = navigations;
  // @ts-ignore
    return (
    <Menu as="div" className="relative">
      <Menu.Button className="-m-1.5 flex items-center p-1.5">
        <span className="sr-only">Open user menu</span>
        <img
          className="h-8 w-8 rounded-full bg-gray-50"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt=""
        />
        <span className="hidden lg:flex lg:items-center">
            <span className="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">
              Tom Cook
            </span>
            <ChevronDownIcon className="ml-2 h-5 w-5 text-gray-400" aria-hidden="true"/>
        </span>
      </Menu.Button>
      <Transition
        as={Fragment}
        enter="transition ease-out duration-100"
        enterFrom="transform opacity-0 scale-95"
        enterTo="transform opacity-100 scale-100"
        leave="transition ease-in duration-75"
        leaveFrom="transform opacity-100 scale-100"
        leaveTo="transform opacity-0 scale-95"
      >
        <Menu.Items className="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
          {userNavigation.map((item: NavigationLink) => (
            <Menu.Item key={item.name}>
              {({active}) => (
                  <Link
                    method={item.name === 'Sign out' ? "post" : "get"}
                    className={`w-full flex items-start pl-3 pr-4 py-2 border-l-4 ${
                      active
                          ? 'border-indigo-400 dark:border-indigo-600 text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300'
                          : 'border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600'
                    } text-base font-medium focus:outline-none transition duration-150 ease-in-out`}
                    href={item.href}
                  >
                    {item.name}
                  </Link>
              )}
            </Menu.Item>
              /*<a
                  href={item.href}
                  className={classNames(
                    active ? 'bg-gray-50' : '',
                    'block px-3 py-1 text-sm leading-6 text-gray-900'
                  )}
                >
                  {item.name}
                </a>*/
          ))}
        </Menu.Items>
      </Transition>
    </Menu>
  )
}

function Separator({ className = "" }) {
  return <div className={classNames(className , "h-6 w-px bg-gray-200")} aria-hidden="true"/>;
}
