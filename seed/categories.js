const { PrismaClient } = require('@prisma/client');
const fs = require('fs');
const path = require('path');
const prisma = new PrismaClient();

const dir = './documents';

const capitalizeFirstLetter = string => {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

const formatToName = string => {
  return capitalizeFirstLetter((path.parse(string).name).replace('_', ' '));
}

const toPathName = string => {
  return (path.parse(string).name).replace(' ', '-').toLowerCase();
}

const getDirectories = source =>
  fs.readdirSync(source, { withFileTypes: true })
    .filter(dirent => dirent.isDirectory())
    .map(dirent => dirent.name);

const getFiles = source =>
  fs.readdirSync(source, { withFileTypes: true })
    .filter(dirent => !dirent.isDirectory())
    .map(dirent => dirent.name);

const seed = async () => {
  const categories = await getDirectories(dir);

  await categories.forEach(async (category) => {
    const files = await getFiles(`${dir}/${category}`);
    await prisma.category.create({
      data: {
        title: capitalizeFirstLetter(category),
        path: toPathName(category),
        pages: {
          create: files.map(file => { 
            const content = fs.readFileSync(`${dir}/${category}/${file}`, 'utf8');
            return{ 
              title: formatToName(file), 
              path: toPathName(file),
              content
            }
          })
        },
      }
    })
  })
  console.log('Added categories data');
}

module.exports = seed;
