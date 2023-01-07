const { PrismaClient } = require('@prisma/client');
const fs = require('fs');
const path = require('path');
const prisma = new PrismaClient();

const dir = './documents';

const capitalizeFirstLetter = string => {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

const getDirectories = source =>
fs.readdirSync(source, { withFileTypes: true })
  .filter(dirent => dirent.isDirectory())
  .map(dirent => dirent.name)

const seed = async () => {
  const categories = await getDirectories(dir);

  await categories.forEach(async (category) => {
    await prisma.category.create({
      data: {
        title: capitalizeFirstLetter(category),
        path: category,
      }
    })
  })
  console.log('Added categories data');
}

module.exports = seed;
