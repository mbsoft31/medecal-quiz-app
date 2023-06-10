import React, {Fragment} from 'react'
import { Head } from "@inertiajs/react";
import { Menu, Transition } from '@headlessui/react'
import { ChartPieIcon, HomeIcon, UsersIcon, EllipsisVerticalIcon } from '@heroicons/react/24/outline'

import DashboardLayout from "@/Layouts/Loyalty/DashboardLayout.js";
import { classNames } from "@/Utils/functions";
import {PageProps, NavigationLink, PageNavigation} from "@/types";
import {UserCircleIcon, ArrowRightCircleIcon} from "@heroicons/react/20/solid";


const navigation: NavigationLink[] = [
  { id: 1, name: "Dashboard", href: '#', icon: HomeIcon, current: true },
  { id: 2, name: 'Businesses', href: '#', icon: UsersIcon, current: false },
  { id: 3, name: 'Translations', href: '#', icon: ChartPieIcon, current: false },
  { id: 4, name: 'Pricing plan', href: '#', icon: ChartPieIcon, current: false },
];

const teams: NavigationLink[] = [
  { id: 1, name: 'Heroicons', href: '#', icon: null, current: false },
  { id: 2, name: 'Tailwind Labs', href: '#', icon: null, current: false },
  { id: 3, name: 'Workcation', href: '#', icon: null, current: false },
];
const userNavigation: NavigationLink[] = [
  { id: 1, name: 'Your profile', href: route('profile.edit'), icon: UserCircleIcon, current: false },
  { id: 2, name: 'Sign out', href: route('logout'), icon: ArrowRightCircleIcon, current: false },
];

const navigations: PageNavigation = {
  navigation,
  teams,
  userNavigation
};

function Stats() {
  const stats = [
    { name: 'Total USERS', stat: '4' },
    { name: 'PAYING CLIENTS', stat: '4' },
    { name: 'MRR', stat: '$100.00' },
    { name: 'ARR', stat: '$1200.00' },
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

const people = [
  {
    name: 'Leslie Alexander',
    email: 'leslie.alexander@example.com',
    role: 'Co-Founder / CEO',
    imageUrl:
      'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'Michael Foster',
    email: 'michael.foster@example.com',
    role: 'Co-Founder / CTO',
    imageUrl:
      'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'Dries Vincent',
    email: 'dries.vincent@example.com',
    role: 'Business Relations',
    imageUrl:
      'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: null,
  },
  {
    name: 'Lindsay Walton',
    email: 'lindsay.walton@example.com',
    role: 'Front-end Developer',
    imageUrl:
      'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'Courtney Henry',
    email: 'courtney.henry@example.com',
    role: 'Designer',
    imageUrl:
      'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'Tom Cook',
    email: 'tom.cook@example.com',
    role: 'Director of Product',
    imageUrl:
      'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
    lastSeen: null,
  },
]

function LatestBusinesses() {
  return (
    <ul role="list" className="divide-y divide-gray-100">
      {people.map((person) => (
        <li key={person.email} className="flex justify-between gap-x-6 py-5">
          <div className="flex gap-x-4">
            <img className="h-12 w-12 flex-none rounded-full bg-gray-50" src={person.imageUrl} alt="" />
            <div className="min-w-0 flex-auto">
              <p className="text-sm font-semibold leading-6 text-gray-900">
                <a href={person.href} className="hover:underline">
                  {person.name}
                </a>
              </p>
              <p className="mt-1 flex text-xs leading-5 text-gray-500">
                <a href={`mailto:${person.email}`} className="truncate hover:underline">
                  {person.email}
                </a>
              </p>
            </div>
          </div>
          <div className="flex items-center gap-x-6">
            <div className="hidden sm:flex sm:flex-col sm:items-end">
              <p className="text-sm leading-6 text-gray-900">{person.role}</p>
              {person.lastSeen ? (
                <p className="mt-1 text-xs leading-5 text-gray-500">
                  Last seen <time dateTime={person.lastSeenDateTime}>{person.lastSeen}</time>
                </p>
              ) : (
                <div className="mt-1 flex items-center gap-x-1.5">
                  <div className="flex-none rounded-full bg-emerald-500/20 p-1">
                    <div className="h-1.5 w-1.5 rounded-full bg-emerald-500" />
                  </div>
                  <p className="text-xs leading-5 text-gray-500">Online</p>
                </div>
              )}
            </div>
            <Menu as="div" className="relative flex-none">
              <Menu.Button className="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                <span className="sr-only">Open options</span>
                <EllipsisVerticalIcon className="h-5 w-5" aria-hidden="true" />
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
                <Menu.Items className="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                  <Menu.Item>
                    {({ active }) => (
                      <a
                        href="#"
                        className={classNames(
                          active ? 'bg-gray-50' : '',
                          'block px-3 py-1 text-sm leading-6 text-gray-900'
                        )}
                      >
                        View profile<span className="sr-only">, {person.name}</span>
                      </a>
                    )}
                  </Menu.Item>
                  <Menu.Item>
                    {({ active }) => (
                      <a
                        href="#"
                        className={classNames(
                          active ? 'bg-gray-50' : '',
                          'block px-3 py-1 text-sm leading-6 text-gray-900'
                        )}
                      >
                        Message<span className="sr-only">, {person.name}</span>
                      </a>
                    )}
                  </Menu.Item>
                </Menu.Items>
              </Transition>
            </Menu>
          </div>
        </li>
      ))}
    </ul>
  )
}

export default function AdminDashboard({ auth }: PageProps) {
  return (
    <DashboardLayout
      navigations={navigations}
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>}
    >
      <Head title="Admin Dashboard" />

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
                    Create Business
                  </button>
                </div>
              </div>
            </div>
            <div className="px-4 py-5 sm:px-6">
              <LatestBusinesses></LatestBusinesses>
            </div>

          </div>
        </div>
      </div>

    </DashboardLayout>
  )
}
