import React, { useState } from 'react';
import Image from 'next/image';
import { Bars3Icon, ChevronDownIcon } from '@heroicons/react/24/solid';
import Link from "next/link";
import { classicNameResolver } from "typescript";
import classNames from "../utils/classNames";

const menu = [
  {
    name: 'Home',
    link: '/',
    special: true,
    open: false,
  },
  {
    name: 'Menu A',
    link: '#',
    special: false,
    open: false,
    submenu: [
      {
        name: 'Sub Menu A',
        link: '#',
      },
      {
        name: 'Sub Menu B',
        link: '#',
      },
      {
        name: 'Sub Menu C',
        link: '#',
      },
      {
        name: 'Sub Menu D',
        link: '#',
      }
    ]
  },
  {
    name: 'Menu B',
    link: '#',
    special: false,
    open: false,
  },
  {
    name: 'Menu C',
    link: '#',
    special: false,
    open: false,
  }
  
]

const Header = () => {
  const [whichOpen, setWhichOpen] = useState(0);

  return (
  <nav className="px-2 bg-gray-50 border-gray-200 dark:bg-gray-900 dark:border-gray-700 border-b">
    <div className="container flex flex-wrap items-center justify-between mx-auto">
      <Link href="#" className="flex items-center gap-3">
        <Image src={`https://flowbite.com/docs/images/logo.svg`} alt="Docudown" width={500} height={500} className="h-5 w-5 sm:h-10 sm:w-10" />
        <h1 className="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Docudown</h1>
      </Link>
      <button
        data-collapse-toggle="navbar-dropdown"
        type="button"
        className="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-dropdown"
        aria-expanded="false"
      >
        <span className="sr-only">Open main menu</span>
        <Bars3Icon className="w-6 h-6" />
      </button>
      <div className="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul className="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          { menu.map((item, key) => (
          <li key={key} className="relative">
              {item.submenu && item.submenu.length > 0 ? 
              <>
                <button
                  className="flex items-center gap-4 justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                  onClick={() => setWhichOpen(key == whichOpen ? 0 : key) }
                >
                  {item.name}
                  <ChevronDownIcon className="w-5 h-5" />
                </button>
                <div
                  className={
                    classNames(`z-10 absolute top-6 right-0 font-normal bg-white rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600`,
                    key == whichOpen ? `` : 'hidden')
                }
                >
                  <ul className="py-1 text-sm text-gray-700 dark:text-gray-400 divide-y divide-gray-100" aria-labelledby="dropdownLargeButton">
                    {item.submenu.map((subitem, subkey) => (
                    <li key={subkey}>
                      <Link 
                        href={subitem.link} 
                        className="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {subitem.name}
                      </Link>
                    </li>
                    ))}
                  </ul>
                </div>
              </>
              : 
              <Link
                href={item.link}
                className={classNames(
                  `block py-2 pl-3 pr-4 md:p-0 rounded md:bg-transparent md:dark:hover:bg-transparent` ,
                  item.special ? `text-white bg-blue-700 md:text-blue-700 md:dark:text-white dark:bg-blue-600`
                  : `text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white`
                )}
                aria-current="page"
              >
                {item.name}
              </Link>
              }
          </li>
          ))}
          
        </ul>
      </div>
    </div>
  </nav>
)};

export default Header;
