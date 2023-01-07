const { PrismaClient } = require('@prisma/client');
const resetSeed = require('./reset.js');

const prisma = new PrismaClient();

const load = async () => {
  try {
    await resetSeed();
    
  } catch (e) {
    console.error(e);
    process.exit(1);
  } finally {
    await prisma.$disconnect();
  }
};

load();
